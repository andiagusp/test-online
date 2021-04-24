#include <iostream>
using namespace std;

void cetak_gambar(int inp){
  if(inp % 2 == 0) {
      throw runtime_error("angka input harus ganjil");
  }
  
  int tengah = inp / 2 + 1;
  
  for(int i = 1; i <= tengah; i++) {
      
      for(int j = tengah; j > i; j--){
          printf(" ");
      }
      
      for(int k = 1; k <= i; k++) {
          if(i == tengah || k == i || k == 1) {
              printf("*");
          } else {
              printf(" ");
              
          }
      }
      
      for(int l = 1; l < i; l++) {
          if((l + 1) == i || i == tengah)  {
              printf("*");
          } else {
              printf(" ");
          }
      }
      
      printf("\n");
  }
  
  for(int m = 1; m < tengah; m++) {
      
      for(int n = 1; n <= m; n++) {
          printf(" ");
      }
      
      for(int p = tengah; p > m; p--){
          if(p == tengah || p == (m + 1)){ 
              printf("*");
          } else {
              printf(" ");
          }
      }
      
      for(int q = tengah-1; q > m; q--) {
          if(q == (m + 1)) {
              printf("*");
          } else {
              printf(" ");
          }    
      }
      
      
      printf("\n");
  }
  
  
}

int main() {
  try {
      cetak_gambar(13);
  } catch(const exception& error) {
      cout << error.what();
  }
  
  return 0;
}