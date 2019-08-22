<template>
    <div class="container">
        <div class="form-group">
            <input v-model="url">
            <button v-on:click="getScrape()">Get</button>
        </div>
    </div>
</template>

<script>
import axios from "axios"
import $ from "jquery"

export default {
    data: function() {
        return {
            url: ""
        }
    },
    methods: {
        getScrape: function() {
            axios.defaults.headers['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
            axios.defaults.headers['content-type'] = 'application/json';

            axios.post("/scrape", {url: this.url}).then((response) => {
                console.log(response)
            }, (error) => {
                console.log(error)
            })
        }
    }
}
</script>