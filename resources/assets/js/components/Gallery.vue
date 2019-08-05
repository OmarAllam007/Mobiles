<template>
    <div>
        <div class="form-group">
            <label for="name"></label>
            <input type="file" ref="myFiles" name="image" id="name" v-on:change="uploadFile">
        </div>
        <button class="btn btn-success">Upload</button>
        <hr>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <img src="">
                    <input disabled type="text" value="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axois from "axios";

    export default {
        name: "gallery",
        data(){
          return {
              files:[]
          }
        },
        methods:{
          uploadFile(event){
              let formData = new FormData();

              /*
                  Add the form data we need to submit
              */
              formData.append('file', this.$refs.myFiles.files[0]);

              /*
                Make the request to the POST /single-file URL
              */
              axois.post('/upload_to_gallery',
                  formData,
                  {
                      headers: {
                          'Content-Type': 'multipart/form-data'
                      }
                  })
          }
        },
        created() {

        }
    }
</script>

<style scoped>

</style>
