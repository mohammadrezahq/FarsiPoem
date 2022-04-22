<?php

namespace FarsiPoem\Drivers;

trait Ganjoor
{
    private object $raw;

    public string $plainText;

    public $verses;

    public string $poet;

    protected function setProperties($raw)
    {
        $this->raw = $raw;
        $this->plainText = $raw->plainText;
        $this->verses = $raw->verses;

        if (isset($raw->top6RelatedPoems[0]->poetName)) {
            $this->poet = $raw->top6RelatedPoems[0]->poetName;
        }
    }

    /**
     * Get a poem randomly or random by poet.
     *
     * @param int $poet Poet id
     * @return $this
     */
    public function random(int $poet = 0)
    {
        if ($this->saved) {
            return $this;
        } else {
            $this->deleteHistory();
        }

        $api = '';

        $api = 'https://api.ganjoor.net/api/ganjoor/poem/random?poetId=' . $poet;

        if (empty($this->raw)) {
            $result = file_get_contents($api);
    
            $json = json_decode($result);
    
            $this->setProperties($json);

            if ($this->history) {
                $_SESSION['fp_user_history'] = $json;
                $_SESSION['fp_user_history_expire'] = time();
            }
        }

        return $this;
    }
}