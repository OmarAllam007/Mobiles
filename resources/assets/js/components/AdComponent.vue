<template>
    <div class="big-banner ">
        <script async src=""></script>
        <!-- MobArrow-responsive -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-1864972736029501"
             data-ad-slot="7077188983"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</template>

<script>
    export default {
        name: "ad-component",
        methods: {},
        created() {
            let ckeditor = document.createElement('script');
            ckeditor.setAttribute('src',"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js");
            document.head.appendChild(ckeditor);

        }
    }
</script>

<style scoped>

</style>