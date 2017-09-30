@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/exam.css') }}">
@endsection


@section('content')
  <main id="vue-app" style="display:none">
    <div class="container" >
        <div class="panel panel-content">
            <div class="panel-heading panel-head-content">Exam No.@{{ answerNo }}</div>
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

        <button type="button" class="btn btn-answer" @click="goAnswer" v-if="isAnswerNotAlready">回答</button>
        <button type="button" class="btn btn-next" @click="goNextExam" v-if="isNextExam">次の問題へ</button>
        <button type="button" class="btn square_btn" data-toggle="modal" data-target="#modal-result" v-if="isAllCompleted">結果を見る</button>

        <div class="alert alert-success" v-if="isCorrect">
            正解！
        </div>

        <div class="alert alert-danger" v-if="isMistake">
            不正解！
        </div>
    </div>
    <div id="modal-result" tabindex="-1" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close">
                        <span>×</span>
                    </button>
                    <h4 class="modal-title">score</h4>
                </div>
                <div class="progress" style="height: 10px;">
                    <div role="progressbar" class="progress-bar progress-bar-striped active" :style="{width : (score * 10) + '%'}"></div>
                </div>
                <div class="modal-body text-center">@{{ score * 10 }} / 100点</div>
                <div class="modal-footer">
                    <a class="btn square_btn" href="{{ url('/') }}" >終了する</a>
                </div>
            </div>
        </div>
    </div>
  </main>
@endsection

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection