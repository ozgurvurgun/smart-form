<?php

namespace Smartlab\ParticipantForm\Controllers\Api;

class CheckUpdate
{
    public function check()
    {
        $path = realpath(__DIR__. '/../../views/pages/formEditor.php');

        if (!$path || !file_exists($path)) {
            http_response_code(404);
            echo 'File not found.';
            exit;
        }

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $lastModified = filemtime($path);

        if (!isset($_SESSION['last_check'])) {
            $_SESSION['last_check'] = $lastModified;
        }

        if ($lastModified > $_SESSION['last_check']) {
            $_SESSION['last_check'] = $lastModified;
            echo file_get_contents($path);
        } else {
            echo '';
        }
    }
}
