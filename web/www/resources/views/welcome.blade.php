<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cascavel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
      </head>
      <body>
      <section id="app" class="section">
        <div class="container">
            <h1 class="title">
                Hello in Cascavel
            </h1>

            <h2 class="title">Monitored services</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>URL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input v-model="service_name" class="input" type="text" placeholder="Name service"></td>
                        <td><input v-model="service_url" class="input" type="text" placeholder="URL service"></td>
                        <td> <button  v-on:click="createService" class="button is-success">Create</button></td>
                    </tr>
                    <tr v-for="service in services">
                        <td>@{{ service.name }}</td>
                        <td>@{{ service.url }}</td>
                        <td> <button class="button is-danger">Delete</button></td>
                    </tr>
                </tbody>
            </table>

        </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
      <script>
        var app = new Vue({
        el: '#app',
        data: {
            message: 'Hello Vue!',
            services: [],
            service_name: '',
            service_url: '',
        },

        methods: {
           getServices: function(){
                // GET /someUrl
                this.$http.get('/api/service/get/all').then(response => {
                    this.services = response.body;
                }, response => {
                    // error callback
                });
           },
           createService: function(){
                // GET /someUrl
                this.$http.post('/api/service/create',
                    {
                        name: this.service_name,
                        url: this.service_url,
                        status: 1,
                    }
                ).then(function (response) {
                    location.reload();
                },function (response) {
                   alert('Erro create service');
                });
           }
        },

        mounted:function(){
            this.getServices();
        }

        })

      </script>
      </body>
    </html>
