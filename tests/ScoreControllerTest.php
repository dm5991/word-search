<?php
// tests/Service/NewsletterGeneratorTest.php
namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ScoreControllerTest extends WebTestCase
{
  public function testExistingProvider()
  {
    $client = static::createClient();

    // Request a specific page
    $client->request('GET', '/api/v1/score/1/php');

    $this->assertResponseIsSuccessful();

    $responseData = json_decode($client->getResponse()->getContent(), true);
    $this->assertArrayHasKey('term', $responseData, 'term field does not exists in JSON response');
    $this->assertEquals($responseData['term'], 'php', 'Term has not been set correctly in response.');
    $this->assertArrayHasKey('provider_id', $responseData, 'provider_id field does not exists in JSON response');
    $this->assertArrayHasKey('score', $responseData, 'score field does not exists in JSON response');
    $this->assertArrayHasKey('total_count', $responseData, 'total_count field does not exists in JSON response');
    $this->assertArrayHasKey('positive_count', $responseData, 'positive_count field does not exists in JSON response');
  }


  public function testNonexistantProvider()
  {
    $client = static::createClient();

    // Request a specific page
    $client->request('GET', '/api/v1/score/1337/php');

    $this->assertResponseStatusCodeSame(501, 'Response code should be 501');
  }
}