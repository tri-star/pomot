<template>
    <div class="log-form">
        <div class="header-col">説明:</div>
        <div class="col"><input type="text" id="log-form-description"></div>
        <div class="header-col">タグ:</div>
        <VueInputTag class="col" tags.sync="tags" placeholder="タグを入力" @update:tags="onUpdateTag" />
        <div class="action-area">
            <button class="action-button" @click="save()" >Save</button>
            <button class="action-button" @click="cancel()" >Cancel</button>
        </div>
    </div>
</template>


<script>

import VueInputTag from 'vue-input-tag'

export default {
    name: 'LogForm',
    components: { VueInputTag },
    data: () => {
        return {
            tags: [],
        }
    },
    methods: {
        onUpdateTag: function(tags){
            this.tags = tags
        },
        save: function() {
            this.$emit('save', {
                succeed: true,
                saved: true
            });
        },
        cancel: function() {
            if(!confirm('作業を破棄しますか？')) {
                return false
            }
            this.$emit('save', {
                succeed: true,
                saved: false
            });
        }
    },
}
</script>


<style scoped>

    .log-form {
        display: flex;
        flex-wrap: wrap;
    }

    .log-form .header-col {
        margin: 5px;
        padding: 5px;
        width: 10%;
        text-align: right;
    }
    .log-form .col {
        margin: 5px;
        padding: 5px;
        width: 75%;
        text-align: left;
    }
    .log-form .col input {
        width: 100%;
    }
    .log-form .action-area {
        margin: 5px;
        padding: 5px;
        width: 100%;
    }
</style>
