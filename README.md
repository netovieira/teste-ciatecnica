# teste-ciatecnica
Teste para Desenvolvedores – Linguagem PHP OO (Laravel) 


### **Objetivo do teste:**

Criar um cadastro de cliente (CRUD) que pode ser utilizado para clientes Pessoa Física ou Pessoa Jurídica. 



**O que deve ser feito:**

Os cadastros devem conter os seguintes campos: 

***Pessoa física:*** 

- CPF
- Data de nascimento
- Nome
- Sobrenome (15 caracteres)
- CEP (8 caracteres)
- Logradouro
- Número
- Complemento
- Bairro
- Cidade
- UF (8 caracteres)  

***Pessoa jurídica:*** 

- CNPJ
- Razão social 
- Nome fantasia 
- CEP (8 caracteres)
- Logradouro
- Número
- Complemento
- Bairro
- Cidade
- UF (8 caracteres) 



- Todos os campos devem ser de preenchimento obrigatório, exceto o campo complemento.
- Colocar a máscara de formatação nos campos CPF e CNPJ.
- A idade permitida para cadastro de uma pessoa física deverá ser no mínimo de 19 anos.
- Ao preencher o CEP implementar a busca com alguma API (de utilização gratuita e livre) para preencher os demais dados relacionados ao endereço.
- A tela para o cadastro deverá ser única.
- Porém, quando selecionado pessoa física deverão ser exibidos somente os campos relacionados à pessoa física, e quando selecionado pessoa jurídica deverão ser exibidos somente os campos de pessoa jurídica.
- Disponibilizar uma API de consulta com todos os clientes cadastrados com saída JSON, via GET. 



***Dados técnicos:*** 

- PHP Laravel 5.5
- MySQL 
