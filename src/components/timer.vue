<template>

<div class="timer-container clearfix">
    <div class="top-label">some text</div>
    <div class="timer">{{ counter }}</div>
    <div class="action-area">
        <button class="action-button">{{ actionName }}</button>
    </div>
</div>

</template>


<script>

export class TimerState  {
    static get WAIT() { return 0 }
    static get RUNNING() { return 1 }
    static get STOPPED() { return 2 }
}

export default {
    name: 'PomotTimer',
    props: [],
    data: function() {
        return {
            state: TimerState.WAIT,
            ellapsedTime: 0,
            counter: 25.00,
            actionName: 'START',
        }
    },
    methods: {
        getRemainingTime: function() {

        },
        action: function() {

        }
    }
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
