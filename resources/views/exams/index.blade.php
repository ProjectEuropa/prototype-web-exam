@extends('layouts.app')

@section('content')
    <div class="container" id="vue-app" style="display:none">

        <!-- Main component for a primary marketing message or call to action -->
        <div class="panel panel-primary">
            <div class="panel-heading">Exam No.@{{ answerNo }}</div>
            <div class="panel-body">
                <p> @{{ title }}</p>
            </div>
        </div>

        <div v-for="(answer, index) in answers">
            <label>
                <input type="radio" name="radios" :value="index + 1" v-model="selectAnswerNo">
                @{{ answer }}
            </label>
        </div>

        <button type="button" class="btn btn-info" @click="goAnswer" v-if="isAnswerNotAlready">回答</button>
        <button type="button" class="btn btn-success" @click="goNextExam" v-if="isNextExam">次の問題へ</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" v-if="isAllCompleted">結果を見る</button>

        <div class="alert alert-success" v-if="isCorrect">
            <strong>正解！</strong>
        </div>

        <div class="alert alert-danger" v-if="isMistake">
            <strong>不正解！</strong>
        </div>
        
        <div class="modal fade" id="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                        <h4 class="modal-title">score</h4>
                    </div>
                    <div class="progress" style="height: 1em">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" :style="{width : (score * 10) + '%'}">
                        </div>
                    </div>
                    <div class="modal-body">
                        @{{ score * 10 }} / 100点
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/') }}"><button type="button" class="btn btn-primary">終了する</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection