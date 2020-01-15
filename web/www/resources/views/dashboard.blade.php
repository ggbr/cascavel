@extends('app')
@section('content')
      <section id="app" class="section">
        @{{ message }}
      </section>
@endsection

@section('script')
<script>
    var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
    },

    methods: {

    },

    mounted:function(){

    }

    })
</script>
@endsection
