<?php

namespace FarsiPoem\App;

trait History
{
    private $history;

    protected $saved;

    public function save(Int $seconds = 86400)
    {
        $this->startSessions();

        if (isset($_SESSION['fp_user_history'])) {

            if(time() - $_SESSION["fp_user_history_expire"] > $seconds) {

                $this->deleteHistory();
                $this->history = true;

            } else {
                $this->saved = true;
                $this->setProperties($_SESSION['fp_user_history']);
            }

        } else {

            $this->history = true;

        }

        return $this;
    }

    private function deleteHistory()
    {
        if (isset($_SESSION['fp_user_history'])) {
            unset($_SESSION['fp_user_history']);
            unset($_SESSION['fp_user_history_expire']);
        }
    }

    private function startSessions()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
}