// this variable beginner or intermediate or senior
const target = window.location.search.replace('?target=', '');
// array of exams table id
let arrayExamIds;

// find exam id from exams and answers table depends on category_id(beginner(1) or intermediate(2) or senior(3))
axios.get('/' + target + '/ids')
    .then(function (response) {
        arrayExamIds = response.data;
        // find first exam data and initialization Vue.js data.
        axios.get('/exam/' + target + '/' + arrayExamIds[0].id)
            .then(function (response) {
                initVue(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
    })
    .catch(function (error) {
        console.log(error);
    });

// This is Limit of Exam number.
const NUM_OF_EXAM_LIMIT = 10;
let vueApp;

function initVue(data) {
    vueApp = new Vue({
        el: '#vue-app',
        data: {
            allData: data,
            score: 0,
            answerNo: 1,
            title: data.title,
            answers: [data.answer_1, data.answer_2, data.answer_3, data.answer_4],
            selectAnswerNo: 0,
            correctAnswerNo: data.correct_answer_no,
            isCorrect: false,
            isMistake: false,
            isAnswerNotAlready: true,
            isNextExam: false,
            isAllCompleted: false,
        },
        mounted: function () {
            document.getElementById('vue-app').style.display = '';
        },
        methods: {
            goAnswer: function () {
                if (this.selectAnswerNo == this.correctAnswerNo) {
                    this.isCorrect = true;
                    this.score += 1;
                } else {
                    this.isMistake = true;
                }
                // TODO answerNo >= 10 (example no) resetAlldata (exam end)
                if (this.answerNo >= NUM_OF_EXAM_LIMIT) {
                    resetAlldata();
                } else {
                    this.isAnswerNotAlready = false;
                    this.isNextExam = true;
                }
            },
            goNextExam: function () {
                this.isAnswerNotAlready = true;
                this.isNextExam = false;
                this.isCorrect = false;
                this.isMistake = false;
                this.selectAnswerNo = 0;
                this.answerNo += 1;
                findNextExamData(arrayExamIds[this.answerNo - 1].id);
            }
        }
    });
}

//find next exam data and overwrite Vue.js data
function findNextExamData(answerNo) {
    axios.get('/exam/' + target + '/' + answerNo)
        .then(function (response) {
            let data = response.data;
            if (data == null) {
                // TODO title and answers delete
                resetAlldata();
            } else {
                vueApp.allData = data;
                vueApp.title = data.title;
                vueApp.answers = [data.answer_1, data.answer_2, data.answer_3, data.answer_4];
                vueApp.correctAnswerNo = data.correct_answer_no;
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}

function resetAlldata() {
    vueApp.allData = [];
    vueApp.title = '試験終了';
    vueApp.answers = [];
    vueApp.answerNo = '-'
    vueApp.isAnswerNotAlready = false;
    vueApp.isNextExam = false;
    vueApp.isAllCompleted = true;
}