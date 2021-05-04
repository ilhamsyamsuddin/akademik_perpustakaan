<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{quizId}}
                <div class="card">
                    <div class="card-header">Soal
                        <span class="float-right">{{questionIndex}}/{{questions.length}}</span>
                    </div>
                    <div class="card-body">
                        <div v-for="(question,index) in questions" v-bind:key="index">
                            <div v-show="index===questionIndex">
                                {{question.question}}
                                <ol type="A">
                                    <li v-for="choice in question.answers" v-bind:key="choice">
                                        <label for="">
                                            <input type="radio">
                                            {{choice.answer}}
                                        </label>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <button class="btn btn-success"@click="prev">Prev</button>
                        <button class="btn btn-success float-right"@click="next()">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['quizId','quizQuestions','hasQuizPlayed','times'],
        data(){
            return{
                questions:this.quizQuestions,
                questionIndex:0,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            next(){
                this.questionIndex++
            },
            prev(){
                this.questionIndex--
            },
        }
    }
</script>
