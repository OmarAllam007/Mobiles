<template>
    <a role="button" href="#"
       style="text-align: center;text-decoration: none;display: block;height: 100%;"
       @click="addLike">
        <div id="notAuth">

        </div>

        <i class="fa fa-2x fa-heart" :class="{'text-danger':is_favourite,'text-dark':!is_favourite}"
           id="heart"></i>
        <span style="color:black;font-size: 1.3em;font-weight: 400"
              id="likesCount">{{likes}}</span>
    </a>
</template>

<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    export default {
        name: "like-component",
        props: ['mobile', 'likes', 'auth', 'favourite'],
        data() {
            return {
                is_favourite: false
            }
        },
        methods: {
            addLike() {
                let likesCount = $('#likesCount')
                let heart = $('#heart')

                jQuery.ajax({
                    type: "POST",
                    url: '/make-favourite',
                    data: {
                        _token: CSRF_TOKEN,
                        mobile_id: this.mobile,
                    },
                    success: (response) => {
                        likesCount.html(response['count'])
                        if (response['is_favourite'] == 0) {
                            heart.removeClass('text-dark').addClass('text-danger')
                        } else {
                            heart.removeClass('text-danger').addClass('text-dark')
                        }
                    }
                });
            }
        },
        created() {

        },
        mounted() {
            this.is_favourite = this.favourite
        }
    }
</script>

<style scoped>

</style>