@echo off 
for %%i in (to_convert/*.jpg) do (^
   magick composite -watermark 10 -gravity West sp_watermark_logo_word_plus.png "to_convert/%%i" "watermarked/%%i"^
   && echo "composite of %%i successful"^
   && echo "resizing of %%i to 30%% successful"^
   && echo "Successfully deleted %cd%\to_convert\%%i" )
pause
