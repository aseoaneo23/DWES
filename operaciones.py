if __name__=='__main__':

    def suma(n1,n2):
        return n1+n2
    
    def resta(n1,n2):
        return n1-n2
    
    def multiplicacion(n1,n2):
        return n1 * n2
    
    def division(n1,n2):
        if n2 == 0:
            print("ERROR: División entre 0")
        else:
            return n1/n2