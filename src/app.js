import Vue from 'vue'
import Swal from 'sweetalert2'

const app = new Vue({
    'el': '#app',
    data(){
        return {
            dnsform: {
                name: "",
                content: ""
            }
        };
    },
    methods: {
        formSubmit(){
            Swal.fire(
                {
                    title: "Success!",
                    text: `Your hostname is now resolvable to ${dnsform.content}`,
                    input: 'text',
                    inputAttributes: {
                        'value': dnsform.name
                    }
                }
            );
        }
    }
});