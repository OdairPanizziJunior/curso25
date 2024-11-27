# curso25

## Como dar permissão para pastas Linux?

*sudo chmod 777 -R .*

| Comando | Significado | 
|--- |--- |
| SUDO | Executar como admin |  
|CHMOD | Permitir |
|777 | Permissão total dos aquivos|
|-R | Recursivo (tudo que estiver dentro dela)|
|. |Pasta local|

## Como Associar editores de texto ao Git
* git config --global core.editor "vim"

## Como Associar editores de texto ao Ubuntu
* sudo update-alternatives --config editor

## Comandos GIT

* GIT INIT
`é usado para inicializar um novo repositório do Git ou converter um projeto já existente em um repositório do Git`


* `git add . ` -> adiciona o mudança
* `git commit -m "instruções no Readme" ` -> Exemplo de Commit
* `git push ` -> manda as novas informações para o GiuHub
* `git checkout -b dev` -> Criar uma Branch chamada DEV e entra nela

## Branch

* HotFix -> Corrigir bug em produção

`master/main` :alien:
`dev/develop` :construction:
`feature XYZ` :sparkles:
`bugFix` :bug: