# CakePHP + Vue.js Contact Form

A simple CakePHP + Vue.js Contact Form.

## Installation

1. Get project into your system
    Via cloning the project into your server:
    ```bash
    git clone git@github.com:ishanvyas22/cakephp-vue-contact-form.git
    cd cakephp-vue-contact-form
    ```
2. Install composer dependencies
    ```bash
    composer install
    ```
3. Copy `.env.example` to `.env`
    ```bash
    cp config/.env.example config/.env
    ```
    Uncomment and set `MAIL_TO`, `MAIL_FROM` and `API_ENDPOINT_SALES` environment variables according to your needs.
4. Start [CakePHP web server](https://book.cakephp.org/4/en/installation.html#development-server) or [create v-host](https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-ubuntu-18-04) to run this app.

All set! Navigate to http://localhost:8765/contact(or http://yourdomain.com/contact if you have created virtual host for this) to see contact form.

## Features

- On successful submit of the "Customer Support", it will send an email to the email which you've set into `MAIL_TO` environment variable, by default it is set to contact@localhost. The from email will be set to `MAIL_FROM` environment variable, by default it is set to noreply@localhost. This will not send an actual email, but it will log the email output into the `logs/email.log` file, to change this behavior you just have to [configure transport](https://book.cakephp.org/4/en/core-libraries/email.html#configuring-transports) into `config/app.php` file.
- On successful submit of the "Sales", it will make an `POST` API request with input data to `API_ENDPOINT_SALES` url which is set into environment variable.

## Built with

- [CakePHP 4.x](https://book.cakephp.org/4/en/intro.html)
- [Vue.js 2.x](https://vuejs.org/v2/guide/)

Made with ❤️ in India 🇮🇳
