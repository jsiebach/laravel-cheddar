# laravel-cheddar
A service provider for using CheddarGetter in Laravel

## Set Up
1. Add this package to your composer.json -

```
    "require": {
        "jsiebach/laravel-cheddar": "^1.0"
    }
```

2. Run `composer update`

3. Add `\JSiebach\Cheddar\CheddarServiceProvider::class` to your array of service providers in `/config/app.php`

4. Run `php artisan vendor:publish` to create the config file 

5. In `/config/cheddar.php`, add your credentials for Cheddar Getter.

## Usage

You can now use dependency-injection to load a CheddarGetter_Client with your credentials automatically set.  In any controller:
```
Class PaymentController extends Controller {
	
	public $client;

	__construct(CheddarGetter_Client $client){
		$this->client = $client;
	}

	public function customerList(){

		$response = $this->client->getAllCustomers();

		//handle response...

	}

}
```