<template>

<div class="timer-container clearfix">
    <div class="top-label">some text</div>
    <div class="timer">{{ remainTime }}</div>
    <div class="action-area">

        <button class="action-button" @click="startTimer()" v-if="state == 0">START</button>
        <button class="action-button" @click="stopTimer()" v-if="state == 1">STOP</button>
        <template v-if="state==2">
            <button class="action-button" @click="save()" >Save</button>
            <button class="action-button" @click="cancel()" >Cancel</button>
        </template>

    </div>
</div>

</template>


<script>

import {sprintf} from 'sprintf-js'

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
            this.resetTimer();
        }, 
        cancel: function() {
            if(!confirm('今回の作業を破棄しますか？')) {
                return false;
            }
            this.resetTimer();
        }
    },
}

</script>

<style scoped>
.timer-container {
}

.top-label {
    width: 100%;
    height: 50px;
    margin: 10px 5px;
    text-align: center;
    float: left;
}
.timer {
    width: 100%;
    height: 100px;
    font-size: 3em;
    margin: 10px 5px;
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
