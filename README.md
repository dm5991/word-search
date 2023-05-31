# word-search

A simple API that calculates the popularity of a certain word and represents that popularity as a score based on the amount of positive and negative comments that include the word.

## Setup

#### Prerequisites
- PHP v8.0 or higher
- Composer v2.6 or higher
- PostgreSQL, MySQL or SQLite

#### Local
Edit DATABASE_URL in the .env file to work with your database of choice and with your DB configurations and edit any other fields if needed.

To run the project either configure a web server to run Symfony or use the Symfony CLI command
```
symfony server:start
```

## Usage

#### Score
Run the search for a given search provider and search term; replace `providerId` with a provider from the implemented providers list and the `term` with the wanted search term
```
GET /api/v1/score{providerId}/{term}
{
    "term": "php",
    "provider_id": 1,
    "score": 3,
    "total_count": 9479,
    "positive_count": 3287
}
```

Implemented providers:
```
GITHUB = 1
```