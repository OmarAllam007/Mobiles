<template>
    <a role="button" href="#"
       style="text-align: center;text-decoration: none;display: block;height: 100%;"
       @click="addLike" @mouseover="is_hover= 1" @mouseout="is_hover=0">

        <i class="fa fa-2x fa-heart" :class="{'text-danger':is_favourite,'text-dark':!is_favourite}"
           id="heart"></i>
        <span style="color:black;font-size: 1.3em;font-weight: 400"
              id="likesCount">{{likes}}</span>
        <p v-show="is_hover && !auth">Please Login First</p>

    </a>


</template>

<script>
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    export default {
        name: "like-component",
        props: ['mobile', 'likes', 'auth', 'favourite'],
        data() {
            return {
                is_favourite: 0,
                is_hover: 0,
            }
        },
        methods: {
            addLike() {
                let likesCount = $('#likesCount')
                let heart = $('#heart')

                $.ajax('/make-favourite', {
                    type: "POST",
                    data: {
                        '_token': CSRF_TOKEN,
                        'mobile_id': this.mobile,
                    },
                    dataType: 'JSON',
                }).done((response)=>{
                    likesCount.html(response)
                    if (response['is_favourite'] == 0) {
                        heart.removeClass('text-dark').addClass('text-danger')
                    } else {
                        heart.removeClass('text-danger').addClass('text-dark')
                    }
                });
            },

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