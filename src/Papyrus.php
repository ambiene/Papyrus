<?php

namespace Ambiene\Papyrus;

use GuzzleHttp\Client;

class Papyrus
{
    private $client;
    private $key;
    private $batchSize;
    private $language;

    /**
     * Papyrus constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            "base_uri" => config("papyrus.base_uri"),
        ]);
        $this->key = config("papyrus.api_key");
        $this->batchSize = config("papyrus.batch_size");
        $this->language = config("papyrus.language");
    }

    /**
     * Search for books.
     *
     * @param string $query
     * @param int|null $batchSize
     * @param string|null $language
     * @return mixed
     */
    public function search($query, $batchSize = null, $language = null)
    {
        $batchSize = $batchSize ?? $this->batchSize;
        $language = $language ?? $this->language;

        try {
            $response = $this->client->get("volumes", [
                "query" => [
                    "q" => $query,
                    "maxResults" => $this->batchSize,
                    "langRestrict" => $this->language,
                    "key" => $this->key,
                ],
            ]);

            return json_decode($response->getBody());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
