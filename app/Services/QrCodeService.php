<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

class QrCodeService
{
    public function generateAndSave($model, $routeName, $folder = 'qrcodes')
    {
        $url = route($routeName, ['id' => $model->id]);

        $qrCodeContent = QrCodeGenerator::format('svg')->size(200)->generate($url);

        $filename = "qr_code_{$model->getTable()}_{$model->id}.svg";
        $filePath = "{$folder}/{$filename}";

        Storage::disk('public')->put($filePath, $qrCodeContent);

        if (Storage::disk('public')->exists($filePath)) {
            $fileSize = Storage::disk('public')->size($filePath);

            $model->qrCode()->create([
                'path' => $filePath,
                'filename' => $filename,
                'mime_type' => 'image/svg+xml',
                'size' => $fileSize,
            ]);
        } else {
            throw new \Exception("Не вдалося знайти файл для обчислення розміру: {$filePath}");
        }

        return $filePath;
    }
}
