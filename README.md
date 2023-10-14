# Interview Task


## To Run the project
- run the following commands
```bash
./scripts/create_env_file.sh
```
- edit the `.env` file and set your environment variables
- run the app
```bash
docker network create "task-network"
```
```bash
docker-compose up --build -d
```
- run bash in the app container
```bash
docker exec -it task-app bash
```
- in the container bash run the following commands
```bash
/bin/prepare_env.sh
```
 - edit the `core/.env` file and set you environment variables
- access your application from browser using [this link](http://127.0.0.1:3515)
## To Access Users List Api 
```bash
curl --location 'http://127.0.0.1:3515/api/v1/en/users?returnTransformer=true&provider=DataProviderX&statusCode=authorised&currency=USD&balanceMin=10&balanceMax=100'
```
## To Sync Data From Provider 
- run bash in the app container
```bash
docker exec -it task-app bash
```
- in the container bash run the following commands
```bash
php artisan db:seed
```

## To Add Extra Data Provider
- add the new data provider to `core/database/seeders/data/` 
```bash
make sure that the new data provider file name something with this pattern "prefix".json
```
- add new "Handler Class" in "core/app/Modules/Transaction/Handler/" and this handlerClass must implement "ProviderHandlerInterface"
- go to "FactoryEnum" file here "core/app/Modules/Transaction/Enum/FactoryEnum.php"
```bash
make sure that you added new provider "prefix" as a new cont value 
```
```bash
make sure that you added new provider "prefix" in "getProvidersPrefixes" function 
```

```bash
make sure that you added new provider "prefix" => "Handler Class" in "getProviderHandlerClass" function 
```
