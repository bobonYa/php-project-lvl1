install:
		composer install

validate:
		composer validate

lint:
		composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-even:
		./bin/brain-even

brain-calc:
		./bin/brain-calc

brain-gcd:
		./bin/brain-gcd

brain-games:
		./bin/brain-games