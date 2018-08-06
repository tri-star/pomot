<template>

    <div id="application">
        <PomotTimer/>
    </div>

</template>

<script>

    import PomotTimer from './timer'

    module.exports = {
        name: 'Application',
        components: { PomotTimer: PomotTimer },
        data: function() {
            return {
                'test': 100
            };
        }
    };

</script>


<style>


</style>