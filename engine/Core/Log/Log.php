<?php

namespace Engine\Core\Log;



class Log
{
    // reset - определяет нужно ли перезаписывать файл
    public function setDataLogFile(array $data, $reset = false, $level = 0)
    {
        
        $pathDir = path_catalog_view('theme') . '/log';
        $pathFile = $pathDir . '/log.txt';

        if (!is_dir($pathDir)) {
            mkdir($pathDir, 777, true);
        }

        //Начала записи в файл
        if ( !is_file($pathFile) || $reset) {
            $open = fopen($pathFile, 'w');
            $first_commit = '=======================================================' . PHP_EOL;
        } else {
            $open = fopen($pathFile, 'a');
            $first_commit = PHP_EOL . '=======================================================' . PHP_EOL;
        }

        if ($level == 0) {
            $first_commit .= date(DATE_RFC822) . PHP_EOL;
            fwrite($open, $first_commit);
        }

        foreach ($data as $value) {
            
            if (is_array( $value )) {
                $this->setDataLogFile($value, false, $level + 1);
            } else {
                $value = $value . PHP_EOL;
                fwrite($open, $value);
            }
        }

        if ( !fclose($open) ) {
            $status['log'] = "Не удалось закрыть лог файл!";
            fwrite($open, $status['log']);
        }

    }





}