# Mava WP Defaults

Plugin WordPress com definições e configurações padrão para sites geridos pela Mavaware.

## Funcionalidades incluídas

- ✅ Ocultação de notificações de novos métodos do plugin Ifthenpay
- 🚧 Integrações futuras com Perfmatters e outros plugins
- 🚧 Página de opções global com ACF

## Atualizações automáticas

Este plugin suporta atualizações automáticas através do [plugin-update-checker](https://github.com/YahnisElsts/plugin-update-checker), que verifica diretamente este repositório GitHub.

### Como funciona

1. O plugin aponta para:  
   `https://github.com/Mavaware-Technologies/mava-wp-defaults/`

2. Lança uma nova versão criando uma **tag** com formato `vX.Y.Z` (ex: `v1.1.0`)  
   Os sites com este plugin instalado receberão uma notificação de atualização.

---

## Instalação

### 1. Manual

1. Faz download da última release (ficheiro ZIP)
2. Carrega via WordPress ou FTP

### 2. Via Composer

```bash
composer require mavaware-technologies/mava-wp-defaults:dev-main
