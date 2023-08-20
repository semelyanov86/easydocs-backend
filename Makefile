check:
	COMPOSER_MEMORY_LIMIT=-1 composer lint
	COMPOSER_MEMORY_LIMIT=-1 composer phpcs
	COMPOSER_MEMORY_LIMIT=-1 composer phpstan
	COMPOSER_MEMORY_LIMIT=-1 composer deptrac
fix:
	COMPOSER_MEMORY_LIMIT=-1 composer phpcbf
analyze:
	COMPOSER_MEMORY_LIMIT=-1 composer phpstan
test:
	COMPOSER_MEMORY_LIMIT=-1 composer test
