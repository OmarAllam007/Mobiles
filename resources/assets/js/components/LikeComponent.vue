<template>
    <a role="button" href="#"
       style="text-align: center;text-decoration: none;display: block;height: 100%;"
       @click="addLike" @mouseover="is_hover= 1" @mouseout="is_hover=0">

        <i class="fa fa-2x fa-heart" :class="{'text-danger':is_favourite,'text-dark':!is_favourite}"
           id="heart"></i>
        <span style="color:black;font-size: 1.3em;font-weight: 400">{{total_likes}}</span>
        <p v-show="is_hover && !auth">Please Login First</p>

    </a>


</template>

<script>
    export default {
        name: "like-component",
        props: ['mobile', 'likes', 'auth', 'favourite'],
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
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "/make-favourite",
                    method: 'post',
                    data: {
                        mobile_id: this.mobile,
                    },
                    success: (result) => {
                        this.all_likes = result
                    }
                });
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