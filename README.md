# cat-facts-sms-service
A service for sending sms as an example for meetup

## Installation
Clone the repo and then bring it up in docker
```bash
git clone git@github.com:php-shropshire/cat-facts-sms-service.git
cd cat-facts-sms-service
docker-compose up -d
docker-compose exec app composer install
```
## Configuration
This package makes use of the .env configuration style, copy .env.example to .env and configure the app

### CLOCKWORK_API_KEY
This package requires an API key at https://www.clockworksms.com, this is required to send the SMS message

## Running
In order to receive the kafka event you need to run the consumer
```bash
docker-compose exec app php app.php consume:subscribers
```

## Requirements
As this is just the sms service you need to bring up the web UI too, this can be found at [php-shropshire/cat-facts-ui](https://github.com/php-shropshire/cat-facts-ui)

## Troubleshooting

### Failed to resolve 'kafka:9092': Name or service not known
Docker network is down, this is all hosted over at [php-shropshire/cat-facts-ui](https://github.com/php-shropshire/cat-facts-ui) which needs to be running first

### 1/1 brokers are down
The app can't connect to kafka, this may be a temporary error or may be due to kafka not being running, this is hosted over at [php-shropshire/cat-facts-ui](https://github.com/php-shropshire/cat-facts-ui) which needs to be running first

## Contributing
Feel free to use this repo as a learning resource, fork the repo and maybe we'll show off your changes in the next PHP Shropshire.  
For example this app currently just lets you know you've subscribed to cat facts but where are the cat facts!? Try adding another system to provide the cat facts
