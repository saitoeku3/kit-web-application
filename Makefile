create:
	php scripts/create_db.php

migrate:
	php scripts/migrate_db.php

drop:
	php scripts/drop_db.php

migrate-reset:
	make drop && make create && make migrate
