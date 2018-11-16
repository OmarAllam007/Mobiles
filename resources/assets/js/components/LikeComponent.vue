<template>
    <a role="button" href="#"
       style="text-align: center;text-decoration: none;display: block;height: 100%;"
       @click="addLike" @mouseover="is_hover= 1" @mouseout="is_hover=0">

        <i class="fa fa-2x fa-heart" :class="{'text-danger':is_favourite,'text-dark':!is_favourite}"
           id="heart"></i>
        <span style="color:black;font-size: 1.3em;font-weight: 400">
            <strong>{{total_likes}}</strong></span>
        <p v-show="is_hover && !auth">{{t['Please Login First']}}</p>

    </a>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "like-component",
        props: ['mobile', 'likes', 'auth', 'favourite','t'],
        data() {
            return {
                is_favourite: 0,
                is_hover: 0,
                all_likes: this.likes,
            }
        },
        methods: {
            addLike() {
                let likesCount = $('#likesCount');
                let heart = $('#heart');

                if(this.auth){
                    var token = document.head.querySelector('meta[name="csrf-token"]');
                    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

                    axios.post(`/make-favourite`, {
                        mobile_id: this.mobile
                    })
                        .then(response => {
                            this.all_likes = response.data.number_of_fans
                            this.is_favourite = response.data.is_favourite
                        })
                        .catch(e => {
                        });
                }

            }
        },
        created() {

        },
        computed: {
            total_likes() {
                return this.all_likes
            }
        },
        mounted() {
            this.is_favourite = this.favourite
        }

    }
</script>

<style scoped>

</style>