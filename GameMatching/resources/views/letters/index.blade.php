<!DOCTYPE html>
<htxl4 lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">    
    <title>쪽지보내기 </title>
</head>
<body class="bg-gray-800 text-gray-300">
    <div class="container mx-auto px-4 pt-8">        
        <h2 class="text-gray-500 font-black">쪽지 보내기</h2>        

        <div class="mt-4">
            <table class="table w-full">                
                <tbody>
                    <tr class="border-b-2">
                        <th scope="row" class="w-48 text-center border-r-2 bg-gray-600 py-2">
                            <div>받는이</div>
                        </th>
                        <td >
                            <span class="ml-2">대머리독수리</span>
                        </td>
                    </tr>  
                    <tr class="border-b-2">
                        <th scope="row" class="w-48 text-center border-r-2 bg-gray-600 py-2">
                            <div>제목</div>
                        </th>
                        <td class="px-2">
                            <span>
                                <input class="w-full bg-gray-500" type="text">
                            </span>
                        </td>
                    </tr>                        
                </tbody>
            </table> 

            <div class="mt-4">
                <textarea class="w-full h-64" name="body" id="body"></textarea>
            </div>

            <div class="mt-4 text-center">
                <span class="bt">
                    <input class="bg-gray-500" type="submit" value="쪽지 보내기">
                </span>
                <span class="ml-2">
                    <button>닫기</button>
                </span>
            </div>
        </div>
    </div>
</body>
</htxl4
