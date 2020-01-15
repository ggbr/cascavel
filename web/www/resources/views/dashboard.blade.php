@extends('app')
@section('content')
    <div id="app">
        <div class="columns">
            <div class="column">
                <h1 class="title is-white"> Servers</h1>
            </div>
        </div>
       <div class="columns">

            <div class="column" v-for="server in servers">
                <div class="card" >
                    <div class="card-content">
                        <h2 class="title">@{{server.name}}</h2>
                        <a class="button is-dark" target="_blanck" v-bind:href="server.url"> Access server</a>
                        <br>
                        <br>
                        <embed  v-bind:src="server.url + '/api/v1/badge.svg?chart=system.cpu&alarm=10min_cpu_usage&refresh=auto'" type="image/svg+xml" height="20"/>
                        <embed  v-bind:src="server.url + '/api/v1/badge.svg?chart=system.ram&alarm=ram_in_use&refresh=auto'" type="image/svg+xml" height="20"/>
                        <embed  v-bind:src="server.url + '/api/v1/badge.svg?chart=system.active_processes&alarm=active_processes_limit&refresh=auto'" type="image/svg+xml" height="20"/>
                        <embed bind:src="server.url + '/api/v1/badge.svg?chart=disk_space._&alarm=disk_space_usage&refresh=auto'" type="image/svg+xml" height="20"/>
                        <hr>
                        <embed v-bind:src="server.url + '/api/v1/badge.svg?chart=system.load&alarm=load_average_1&refresh=auto'" type="image/svg+xml" height="20"/>
                        <embed v-bind:src="server.url + '/api/v1/badge.svg?chart=system.load&alarm=load_average_5&refresh=auto'" type="image/svg+xml" height="20"/>
                        <embed v-bind:src="server.url + '/api/v1/badge.svg?chart=system.load&alarm=load_average_15&refresh=auto'" type="image/svg+xml" height="20"/>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
        servers: [],
    },

    methods: {
        getServers: function(){
            // GET /someUrl
            this.$http.get('/api/serve/get/all').then(response => {
                this.servers = response.body;
            }, response => {
                // error callback
            });
        },
    },

    mounted:function(){
        this.getServers()
    }

    })
</script>
@endsection
