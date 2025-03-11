prepare:
	@echo "--> Preparando ambiente..."
	@sh ./bin/prepare.sh
	@cp .env.example .env
	@echo "--> Iniciando containers..."
	@docker compose up -d
	@echo "--> Verificando versões do PHP..."
	@docker-compose run --rm php_fpm php -v
	@echo "--> Verificando versões do composer..."
	@docker-compose run --rm php_fpm composer --version
up:
	@echo "--> Iniciando containers..."
	@docker-compose up -d

down-all:
	@echo "--> Parando e removendo containers, volumes e órfãos..."
	@docker-compose down --volumes --remove-orphans

down:
	@echo "--> Parando containers..."
	@docker-compose down





