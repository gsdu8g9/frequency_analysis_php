#Word frequency analysis

This PHP webapp takes a text document and returns a table displaying the top 25 most frequently used words along with their frequencies. The details of the implementation are as follows:

1) The text document is made in to an array of words. This array is sanitized by removing null strings and hyphens from the array, and trimming punctuation marks from words.

2) The words in the array are stemmed, i.e. "talked" becomes "talk". The stemmer function determines if a word ends in one of three potential suffixes: "-s", "-ed", and "-ing". If it does, the potential suffix is trimmed to reveal a potential root. If this root is in the array of words, it is determined to be a real root. This is done to avoid false roots, i.e. "less" becoming "les", or "educated" becoming "educat". One drawback of this solution is that if the root is not in the array, the word is not stemmed even though it may have a real root. But, if the root of a word is not in the array, it is unlikely that the root and its variations appear very frequently in the text document anyway.

3) The PHP function array_count_values is run on the array of stemmed words, and returns an associative array whose keys are the words and whose values are the number of times each word appeared in the array, and thus in the document.

4) This array is sorted by its values with the PHP function asort. This sorts them in aescending order, so it is reversed so the most frequent words will be at the beginning of the array.

5) The first 25 entries in the array, which are the top 25 most frequently used words, are output to a table with their rank, the word, and its frequency.

