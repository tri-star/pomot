<template>

<div class="timer-container clearfix">
    <transition name="toast">
        <div id="toast" v-if="showToast">{{ toastMessage }}</div>
    </transition>
    <div class="timer">{{ remainTime }}</div>
    <div class="state-label">{{ labelText }}</div>

    <div class="action-area">

        <button class="action-button" @click="startTimer()" v-if="state == 0">START</button>
        <button class="action-button" @click="stopTimer()" v-if="state == 1">STOP</button>
        <button class="action-button" @click="breakStart()" v-if="state == 3">BREAK</button>
        <button class="action-button" @click="breakDone()" v-if="state == 4">STOP</button>
        <button class="action-button" @click="startTimer()" v-if="state == 5">START</button>
        <LogForm v-if="state==2" @save="onSave"/>

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
            default: 1 * 60
        },
        initialBreakSeconds: {
            default: 1 * 60
        },

    },
    data: function() {
        return {
            state: TimerState.WAIT,
            ellapsedTime: 0,
            remainSeconds: this.initialSeconds,
            actionName: 'START',
            timer: null,
            toastMessage: '',
            showToast: false,
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
                    return '"Break"を押すと休憩を開始します';
                case TimerState.BREAKING:
                    return '休憩中...';
                case TimerState.BREAK_DONE:
                    return '休憩終了！次の作業を開始する場合、"Start"を押してください';
            }
            return '';
        }
    },
    methods: {
        startTimer: function() {
            const self = this;
            this.state = TimerState.RUNNING;
            this.remainSeconds = this.initialSeconds;
            this.timer = setInterval(() => {
                self.remainSeconds--;
                if(self.remainSeconds <= 0) {
                    this.stopTimer();
                }
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
        breakStart: function() {
            const self = this;
            this.state = TimerState.BREAKING;
            this.remainSeconds = this.initialBreakSeconds;
            this.timer = setInterval(() => {
                self.remainSeconds--;
                if(self.remainSeconds <= 0) {
                    this.breakDone();
                }
            }, 1000);
        },
        breakDone: function() {
            this.state = TimerState.BREAK_DONE;
            clearInterval(this.timer);
        },
        onSave: function(result) {
            if(!result.succeed) {
                this.setToast('保存に失敗しました');
            }
            if(result.saved) {
                this.setToast('保存しました');
                this.state = TimerState.BREAK_WAIT;
            } else {
                this.setToast('破棄しました');
                this.resetTimer();
            }
        },
        setToast: function(message) {
            this.toastMessage = message;
            this.showToast = true;
            setTimeout(() => {
                this.showToast = false;
            }, 2000);
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

#toast {
    position: absolute;
    height: 30px;
    line-height: 30px;
    width: 80%;
    padding: 10px;
    left: 50%;
    border: 1px solid rgba(223, 218, 170, 100%);
    transform: translate(-50%, 0);
    background-color:rgba(255, 250, 205, 83%);
    color:rgba(160, 105, 51, 100%);
    border-radius: 4px;
}

.toast-enter, .toast-leave-to {
    opacity: 0;
    height: 0px;
}

.toast-enter-active, .toast-leave-active {
    transition: all 600ms ease;
}

.actionarea-enter, .actionarea-leave-to{
    
    height: 0px;
}
.actionarea-enter-active, .actionarea-leave-active {
    transition: all 900ms linear;
}

</style>
