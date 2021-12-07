<!DOCTYPE html>
<html>
    <head>
        <title>Posts</title>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <h1>Posts</h1>
        <div id="root">
            <ul>
                <li v-for="post in posts">
                    @{{ post.title }}</li>
            </ul>
        </div>

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            var app = new Vue({
                el: "#root",
                data: {
                    posts: [],
                },
                mounted()
                {
                    axios.get("{{ route('api.index1') }}")
                        .then(response=>{
                            this.posts = response.data;
                        })
                        .catch(response=>{
                            console.log(response);
                        })
                }
            });
        </script>
    </body>
</html>