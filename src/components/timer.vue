<template>

<div class="timer-container clearfix">
    <div class="timer">{{ remainTime }}</div>
    <div class="state-label">{{ labelText }}</div>
    <div class="action-area">

        <button class="action-button" @click="startTimer()" v-if="state == 0">START</button>
        <button class="action-button" @click="stopTimer()" v-if="state == 1">STOP</button>
        <LogForm v-if="state==2" />

    </div>
</div>

</template>


<script>

import {sprintf} from 'sprintf-js'
import InputTag from 'vue-input-tag'
import LogForm  from './log-form'

export class TimerState  {
    static get WAIT() { return 0 }
    static get RUNNING() { return 1 }
    static get DONE() { return 2 }
    static get BREAK_WAIT() { return 3 }
    static get BREAKING() { return 4 }
    static get BREAK_DONE() { return 5 }
}

export default {
    name: 'PomotTimer',
    components: {InputTag, LogForm},
    props: {
        initialSeconds: {
            default: 25 * 60
        }
    },
    data: function() {
        return {
            state: TimerState.WAIT,
            ellapsedTime: 0,
            remainSeconds: this.initialSeconds,
            actionName: 'START',
            timer: null,
        }
    },
    computed: {
        remainTime: function() {
            const min = this.remainSeconds / 60;
            const seconds = this.remainSeconds % 60;
            return sprintf('%d.%02d', min, seconds) 
        },
        labelText: function() {
            switch(this.state) {
                case TimerState.WAIT:
                    return '"START"を押してください';
                case TimerState.RUNNING:
                    return '実行中...';
                case TimerState.DONE:
                    return '"Save"または"Cancel"を選んでください';
                case TimerState.BREAK_WAIT:
                    return '"START"を押すと休憩を開始します';
                case TimerState.BREAKING:
                    return '休憩中...';
                case TimerState.BREAK_DONE:
                    return '休憩終了！';
            }
            return '';
        }
    },
    methods: {
        startTimer: function() {
            const self = this;
            this.state = TimerState.RUNNING;
            this.timer = setInterval(() => {
                self.remainSeconds--;
            }, 1000);
        },
        stopTimer: function() {
            this.state = TimerState.DONE;
            clearInterval(this.timer);
        },
        resetTimer: function() {
            this.remainSeconds = this.initialSeconds;
            this.state = TimerState.WAIT;
        },
        save: function() {
            alert(this.tags)
            this.resetTimer();
        }, 
        cancel: function() {
            if(!confirm('今回の作業を破棄しますか？')) {
                return false;
            }
            this.resetTimer();
        },
        onUpdateTag: function(tags) {
            this.tags = tags
        }
    },
}

</script>

<style scoped>
.timer-container {
}

.state-label {
    width: 100%;
    height: 30px;
    line-height: 30px;
    margin: 10px 5px;
    text-align: center;
    float: left;
}
.timer {
    width: 100%;
    height: 100px;
    font-size: 6em;
    margin: 30px 5px;
    text-align: center;
    float: left;
}

.action-area {
    width: 100%;
    height: 50px;
    margin: 10px 5px;
    text-align: center;
    float: left;
}
.action-area button {
    padding: 10px;
}

</style>
