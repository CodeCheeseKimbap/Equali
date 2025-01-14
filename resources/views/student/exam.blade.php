<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equali | StudentExam </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@100;300;400;500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="min-h-screen w-[1440px] mx-auto ">

        <div class="flex justify-between">
            <div class="w-full">
                <nav class="h-[60px] flex justify-between mx-[40px]">

                    <div class="w-[500px] flex justify-between items-center">
                        <div>
                            <h1 class=" text-[36px] font-raleway font-semibold"><span
                                    class="text-[#2217D0]">e</span>quali.
                            </h1>
                        </div>
                    </div>

                </nav>
                <form action="{{ route('submit-exam') }}" method="POST" class=" mt-4">
                    <div class="w-full">
                        @csrf
                        <div class="mx-16">
                            <div class="w-full  h-10 bg-[#E0DFE7] rounded-lg flex justify-between">
                                <div class="p-2 ">
                                    <h1 class="text-[#2B6BE6] font-poppins font-bold text-lg">Qualifying Exam</h1>
                                </div>
                                <div class="p-2 ">
                                    <h1 class="text-[#2B6BE6] font-poppins  text-lg">Time: 00:02:00/ 01:00:00</h1>
                                </div>
                                <div class="">
                                    <button type="submit"
                                        class="bg-[#2B6CE6] text-white p-2 px-8 rounded-lg hover:bg-[#134197]">Submit</button>
                                </div>


                            </div>


                        </div>

                        <div class=" mt-3">
                            @foreach ($randomExam->examQuestion as $index => $examQuestion)
                                <div class="mx-16">
                                    <h1 class="font-bold  text-lg text-[#2B6BE6]">
                                        {{-- Question {{ $index + 1 }} --}}
                                    </h1>

                                    <p class="text-[#626B7F]">
                                    <h2>{{ $examQuestion->question->question_text }}</h2>
                                    </p>
                                    <div>
                                        <div class="border-t-2 border-x-2 rounded-t-lg flex  w-6/12  items-center">
                                            <input class="py-2 px-4 ml-2" type="radio"
                                                name="answer[{{ $index + 1 }}]" id="" required
                                                value="{{ $examQuestion->question->choices->get(0)->choice_text }}">
                                            <p class="ml-2 py-1">
                                                {{ $examQuestion->question->choices->get(0)->choice_text }}
                                            </p>
                                        </div>
                                        <div class="border-x-2 border-t-2 flex w-6/12  items-center">
                                            <input class="py-2 px-4 ml-2" type="radio"
                                                name="answer[{{ $index + 1 }}]" id="" required
                                                value="{{ $examQuestion->question->choices->get(1)->choice_text }}">
                                            <p class="ml-2">
                                                {{ $examQuestion->question->choices->get(1)->choice_text }}</p>
                                        </div>
                                        <div class="border-x-2 border-t-2 flex w-6/12  items-center">
                                            <input class="py-2 px-4 ml-2" type="radio"
                                                name="answer[{{ $index + 1 }}]" id="" required
                                                value="{{ $examQuestion->question->choices->get(2)->choice_text }}">
                                            <p class="ml-2">
                                                {{ $examQuestion->question->choices->get(2)->choice_text }}</p>
                                        </div>
                                        <div class="border-2 rounded-b-lg flex  w-6/12  items-center">
                                            <input class="py-2 px-4 ml-2" type="radio"
                                                name="answer[{{ $index + 1 }}]" id="" required
                                                value="{{ $examQuestion->question->choices->get(3)->choice_text }}">
                                            <p class="ml-2">
                                                {{ $examQuestion->question->choices->get(3)->choice_text }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mx-0 border-b-2 my-8"></div>
                            @endforeach
                        </div>

                    </div>
                    <input type="hidden" name="exam_id" value="{{ $randomExam->id }}">
                </form>
            </div>
        </div>
    </div>




</body>

</html>
