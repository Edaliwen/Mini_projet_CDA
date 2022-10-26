<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getVersaillesData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://data.education.gouv.fr/api/v2/catalog/datasets/fr-en-annuaire-education/records?select=nom_etablissement%2C%20type_etablissement%2C%20statut_public_prive%2C%20adresse_1%2C%20code_postal%2Cmail&where=nom_commune%3D%22Versailles%22&where=type_etablissement%20%3D%20%22Coll%C3%A8ge%22%20OR%20%22Ecole%22%20OR%20%22Lyc%C3%A9e%22&order_by=type_etablissement%20asc&limit=100&offset=0'
        );
        return $response->toArray();
    }
}
?>