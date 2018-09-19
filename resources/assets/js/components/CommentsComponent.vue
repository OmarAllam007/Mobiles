<template>
    <div>

        <div class="card comment-card" v-if="!is_loading" v-for="(comment,key) in last_comments">
            <div class="card-header comment-card-header">
                <p class="text-center">
                    <span class="float-left"><b>
                          {{key}} / {{comment.username}}
                    </b></span>
                    <span>{{comment.city}} - {{comment.country}}</span>
                    <span class="float-right">{{comment.created}}</span>
                </p>
            </div>
            <div class="card-body">
                <div class="card-title comment-card-title">
                    <div class="user-image-div">
                        <p>
                            {{comment.username.charAt(0).toUpperCase()}}
                        </p>
                    </div>
                    <div class="comment-inner-div">
                        <p>{{comment.comment}}</p>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
        <div class="text-center" v-if="is_loading"><i class="fa fa-2x fa-spin fa-spinner"></i> Loading</div>
        <div class="text-center" v-if="!is_loading">
            <button class="btn btn-success" @click="loadMore"><i class="fa fa-chevron-circle-down"></i>
            </button>
            <button class="btn btn-success" @click="loadUp"><i class="fa fa-chevron-circle-up"></i>
            </button>
        </div>
        <div v-if="!is_loading">
            <div class="form-group">
                <input class="form-control" name="name" placeholder="Name" v-if="!auth" v-model="name">
            </div>
            <div class="form-group">
    <textarea name="comment" id="comment" cols="30" rows="3" class="form-control main-font" v-model="comment"
              placeholder="Enter your comment"></textarea>
            </div>
            <button class="btn btn-success" @click="submitComment" :disabled="!isValid">Post</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "comments",
        props: ['comments', 'mobile_id', 'auth'],
        data() {
            return {
                comment: '',
                name: '',
                all_comments: [],
                is_loading: false,
                last_index: 4,
            }
        },
        methods: {
            submitComment() {
                this.is_loading = true;

                var token = document.head.querySelector('meta[name="csrf-token"]');
                window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

                axios.post(`/post-comment`, {
                    comment: this.comment,
                    name: this.name,
                    mobile_id: this.mobile_id,
                })
                    .then(response => {
                        this.all_comments.push(response.data)
                        this.comment = ''
                        this.name = ''
                        this.is_loading = false;
                    })
                    .catch(e => {
                    });


            },
            loadMore() {

                if (this.last_index != this.comments.length) {
                    let data = this.comments.slice(this.last_index, this.last_index + 4)
                    data.length >= 4 ? this.last_index += 4 : this.last_index += data.length
                    this.all_comments = data.reverse()
                }
            },
            loadUp() {
                if (this.last_index > 4) {
                    let end = 0
                    let start = 0
                    this.last_index - 4 <= 4 ? end = 4 : end = this.last_index - 4;
                    end - 4 <= 0 ? start = 0 : start = end - 4;
                    this.all_comments = this.comments.slice(start, end).reverse()
                    this.last_index = end;  
                }
            }
        },
        created() {
            this.is_loading = true
            setTimeout(() => {
                this.all_comments = this.comments
                this.is_loading = false
            }, 1000)
        },
        computed: {
            last_comments() {
                return this.all_comments.reverse().slice(0, 4)
            },
            isValid() {
                return !this.auth ? (this.comment.length > 5 && this.name.length > 0) : this.comment.length > 5
            }
        }

    }
</script>

<style scoped>

</style>