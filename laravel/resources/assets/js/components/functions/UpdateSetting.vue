<template>
    <div class="block">
        <h3>{{title}}</h3>
        <div>
            <el-input class="input" :placeholder="placeholder" v-model="input"></el-input>
        </div>
        <div>
        	<el-button type="primary" :loading="loading" @click="update()">{{button_text}}</el-button>
        </div>
        <div>
            {{message}}
        </div>
    </div>
</template>

<script>
export default {
    props: ['title', 'placeholder'],
    data() {
        return {
            message :'',
            input: '',
            button_text: 'Save',
            loading: false
        }
    },
    methods: {
        update: function() {
            this.loading = true;
            this.button_text = 'Updating';
            
            var url = '/';
            var params = { 
                "github_token": this.input
            };
            axios.get(url, params).then(
                res => {
                    this.loading = false;
                    this.button_text = 'Save';
                    //this.message = res.data.message;
                    this.show_message(res.data);
                    console.log(res);
                })
                .catch(error => {
                    throw error
                }
            );
        },
        get: function() {
            var url = '/';
            var params = { 
            };
            axios.get(url, params).then(
                res => {
                    this.input = "loaded setting token from server";
                    console.log(res);
                })
                .catch(error => {
                    throw error
                }
            );
        },
        show_message: function(data) {
            if (data.success) {
                this.$message({
                    message: 'success.message', // put data.message
                    type: 'success'
                });
            } else {
                this.$message.error('error.message');  // put data.message
            }
        }
    },
    created: function() {
        this.get();
    }
}
</script>

<style scoped>
.block div {
    margin-bottom: 5px;
}
.input {
    width: 500px;
}
</style>
