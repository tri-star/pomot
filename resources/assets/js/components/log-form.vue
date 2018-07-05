<template>
    <div class="log-form">

        <div class="log-form-table">
            <div class="row">
                <div class="header-col">説明:</div>
                <div class="col"><input type="text" id="log-form-description"></div>
            </div>
            <div class="row">
                <div class="header-col">タグ:</div>
                <div class="col"><VueInputTag tags.sync="tags" placeholder="タグを入力" @update:tags="onUpdateTag" /></div>
            </div>
        </div>
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
    }

    .log-form-table {
        display: table;
        margin: auto;
        border-collapse: separate;
        border-spacing: 5px;
    }
    .log-form-table .row {
        display: table-row;
    }

    .log-form-table .header-col {
        display:table-cell;
        width: 60px;
        height: 40px;
        text-align: right;
    }
    .log-form-table .col {
        display:table-cell;
        width: 280px;
        height: 40px;
        text-align: left;
    }
    .log-form .col input {
        width: 280px;
    }
    .log-form .action-area {
        margin: 5px;
        padding: 5px;
        width: 100%;
    }
    .log-form .action-area button {
        padding: 10px;
        margin: 0px 10px;
    }
</style>
