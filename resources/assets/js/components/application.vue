<template>

    <div id="application">
        <header>
            <h1>Pomot</h1>
            <nav></nav>
        </header>
        <article class="body-container">
            <PomotTimer/>
        </article>
        <aside>Menu</aside>
        <footer>Footer</footer>
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

.clearfix:after {
    content:" ";
    display:block;
    clear:both;
}

@media screen and (max-width: 479px) {
    #application {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 60px 60px auto 60px;
    }

    #application header {
        grid-column: 1 / 2;
        grid-row: 1 / 2;
        background-color: #eee;
    }

    #application aside {
        grid-column: 1 / 2;
        grid-row: 2 / 3;
        background-color: #ff0;
    }

    #application .body-container {
        grid-column: 1 / 2;
        grid-row: 3 / 4;
        min-height: 500px;
    }

    #application footer {
        grid-column: 1 / 2;
        grid-row: 4 / 5;
        background-color: #ccc;
    }
}

@media screen and (min-width: 480px) {
    #application {
        display: grid;
        grid-template-columns: 200px 1fr;
        grid-template-rows: 200px 1fr 60px;
    }

    #application header {
        grid-column: 1 / 3;
        grid-row: 1 / 2;
        background-color: #eee;
    }

    #application aside {
        grid-column: 1 / 2;
        grid-row: 2 / 3;
        background-color: #ff0;
    }

    #application .body-container {
        grid-column: 2 / 3;
        grid-row: 2 / 3;
        min-height: 400px;
    }

    #application footer {
        grid-column: 1 / 3;
        grid-row: 3 / 4;
        background-color: #ccc;
    }
}

</style>