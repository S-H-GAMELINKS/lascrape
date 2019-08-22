<template>
    <div class="container">
        <div class="form-group">
            <input v-model="url">
            <button v-on:click="getScrape()">Get</button>

            <div v-for="(key, index) in html" :key=index>
                {{Object.keys(key)[0]}}:{{Object.values(key)[0]}}
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios"
import $ from "jquery"

export default {
    data: function() {
        return {
            url: "",
            html: []
        }
    },
    methods: {
        getScrape: function() {
            axios.defaults.headers['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
            axios.defaults.headers['content-type'] = 'application/json';

            axios.post("/scrape", {url: this.url}).then((response) => {
                this.html.push(response.data)
                console.log(response)

                this.$forceUpdate()
            }, (error) => {
                console.log(error)
            })
        }
    }
}
</script>